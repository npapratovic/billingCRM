<?php
/* aaaaaaaaaaaaaaaa
* @repo_name = you can find it in your repo URL : https://bitbucket.org/a_name/repo_name/
* @repo_home = 'bitbucket' OR 'github'
* @type = FTP or SSH or NONE if it's the same server
* If you want to copy your files on the server hosting FTPbucket's script, set 'type'=>'none'.
* @ftp_path is relative to the ftp_host. If type is 'none', path is relative to FTPbucket's script location. '../' is usually a good idea.
*
* You can set a specific server for each branch or just change the path
*
* If you work with multiple servers: FTP credentials are the one of your target server, not the server hosting FTPbucket's script. 
* 
*/

return array(
    'repos' => array( 
        'repo1' => array (
            'repo_name'=>'billingCRM',
            'repo_host'=>'github',
            'branches'=>array(
                array(
                    'branch_name'=>'master',
                    'type'=>'ftp',
                    'ftp_host'=>'89.201.175.56',
                    'ftp_user'=>'crmgo@crm.go.hr',
                    'ftp_pass'=>'ae9XIVOmQPox',
                    'ftp_path'=>'../',
                ),
            ),        
        ),
    ),
    // Your BitBucket Credentials
    'bitbucket' => array(
        'username' => '',
        'password' => ''
    ),
    // Your GitHub Credentials
    'github' => array(
        'username' => 'npapratovic',
        'password' => '0165044026Aa'
    ),
    // ADMIN password for FTPBucket's UI
    'admin_pass' => 'admin'
)