/**
 * Example Class
 *
 * @version 1.0.0
 * @copyright 2018 SEDA.digital GmbH & Co. KG
 */

// NOTE: When importing modules from npm, make sure to check if they use ES6 syntax or not.
// If so, add them to the include regex for babel-loader in webpack.config.js
import ClassLogger from 'ClassLogger';
// to import legacy 3rd party scripts (into the global space) use the script-loader like this:
// import legacyScript from 'script-loader!../../vendor/legacy/script.js';

class Example {
    getClassName() {return 'Example';}
    constructor() {
        let self = this;
        self.logger = ClassLogger(self, true); // set second parameter to false to disable logging

        // init properties
        self.options = {

        };

        self.examplefunction();
    }

    examplefunction() {
        let self = this;
        self.logger.log('Example function is running...'); // also supports .warn() and .error()
        //...
    }
}

export default Example;
