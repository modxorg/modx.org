<?php
require_once dirname(__FILE__) . '/base.class.php';

/**
 * Generates a list of all folders up to a certain depth within the specified media source
 *
 * Class RedactorListDirectoriesProcessor
 */
class RedactorListDirectoriesProcessor extends RedactorBaseProcessor {

    /**
     * Process the request by loading all directories within the configured limit in the media source
     *
     * @return string
     */
    public function process()
    {
        $maxDepth = $this->modx->getOption('redactor.initial_directory_depth', null, 1);
        $results = $this->getFolders('/', $maxDepth);

        return $this->modx->toJSON(array(
            'cs' => $this->source->get('id'),
            'title' => $this->source->get('name'),
            'results' => $results
        ));
    }

    /**
     * Failure JSON generation
     *
     * @param string $msg
     * @param null $object
     * @return string
     */
    public function failure($msg = '', $object = null)
    {
        return $this->modx->toJSON(array(
            'success' => false,
            'message' => $msg,
            'cs' => ($this->source) ? $this->source->get('id') : 0,
            'title' => ($this->source) ? $this->source->get('name') : 'error',
            'results' => array(),
        ));
    }

    /**
     * Grab the folders within the specified $path, recursively up to $depth levels deep.
     *
     * @param string $path
     * @param int $depth
     * @return array
     */
    public function getFolders($path, $depth)
    {
        $list = $this->source->getContainerList($path);

        $results = array();
        foreach ($list as $folder) {
            // Skip files
            if ($folder['type'] !== 'dir') {
                continue;
            }

            // Prepare the folder item
            $item = array(
                'path' => trim($folder['id'], '/')
            );

            // Only if we're within the approved depth, we will add subfolders if there are any
            $childDepth = $depth - 1;
            if ($folder['leaf'] === false && $childDepth > 0) {
                // Recursively get the folders of the children
                $children = $this->getFolders($folder['pathRelative'], $childDepth);
                // If we have children, add them to the item
                if (!empty($children)) {
                    $item['children'] = $children;
                }
            }

            // Add the folder item to the list
            $results[] = $item;
        }

        // return the list of folders within $path
        return $results;
    }
}

return 'RedactorListDirectoriesProcessor';