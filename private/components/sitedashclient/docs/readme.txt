# SiteDash Client

SiteDash Client is a companion package for MODX Revolution go with the SiteDash service.

SiteDash Client allows SiteDash to retrieve information about your MODX site, server,
installed packages, and other information. That information is sent to SiteDash, which
tries to make sense out of it, and present it back to you in a convenient dashboard.



## Installation

During installation you'll be asked to provide a Site Key. Visit the SiteDash website,
signup or login, and create a site to generate a unique Site Key.

Once generate, paste the Site Key into the setup options field, which will then handle
exchanging keys that are used to cryptographically sign further communication.

It is strongly recommended to set up your site to use HTTPS. This will ensure that
communication between SiteDash and your website is encrypted. On HTTP we check the
authenticity, but the returned information may be readable by attackers in the middle.



## What information is collected?

The Client sends back a lot of information, allowing SiteDash to provide you with good
insights you may not have seen otherwise.

The collected information includes:

- MODX Version number
- MODX Manager URL, language, and the selected rich text editor
- Indication if the core folder is moved out of the root
- PHP Version number
- PDO Driver name, client version, and server version.
- Total amount of disk space available, and free disk space avaialble
- Configured memory limit and max execution time
- Server IP address, hostname, software, and protocol
- HTTPS flag indicating if the request used HTTPS
- List of configured package providers with for each:
   - provider name
   - configured service URL
   - username
- List of the packages that have been installed, including older versions, with
  the following information for each:
  - Signature (e.g. redactor-2.2.0-pl)
  - Created/updated/installed timestamps
  - Provider installed from
  - Package name
  - Version number

The collected information is added to the SiteDash database, and processed further
in various ways. This processing may include deduplication, adding more detail from
other sources, or interpreting raw data into trends or potential improvements.

SiteDash may also connect to your site directly to probe for other information or
checks. For example, you may see requests from SiteDash attempting to access your
core folder if it is not outside the webroot.

