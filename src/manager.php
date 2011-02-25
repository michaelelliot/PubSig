<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>

        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <meta http-equiv="Content-language" content="en" />
        <link type="text/css" rel="stylesheet" href="css/styles.css" />
        <title></title>
    </head>
    <body>
        <img src="images/logo.png" /><br />
        <div id="header-bar"></div>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <td align="left" valign="top" width="300">
                    <div class="menu">
                        <ul>
                            <li class="selected">Home</li>
                            <li><a id="" href="#">Messages (1)</a></li>
                            <li><a id="menu_item_2" href="#">Create a Certificate</a></li>
                            <li><a href="#">Sign a Certificate</a></li>
                            <li><a href="#">Signing Authorities</a></li>
                        </ul>
                    </div>
                </td>
                <td align="left" valign="top" class="content">
                    <div class="content">

                        <h2>Create a Certificate</h2>
                        <div class="body">
                            <p>This page allows you to create a new certificate along with a newly generated key pair. This can be used to create certificates for others or to setup the initial certificate that will be used by this Signing Authority.</p>

                            <form>
                                <div class="form">
                                    <h3>Certificate Fields</h3>
                                    <table cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td align="left" valign="middle" nowrap class="first">Name:</td>
                                            <td align="left" valign="middle" width="300"><input type="text" name="name" value="" /></td>
                                        </tr>
                                        <tr>
                                            <td align="left" valign="middle" class="first">Comment:</td>
                                            <td align="left" valign="middle"><input type="text" name="comment" value="" /></td>
                                        </tr>
                                        <tr>
                                            <td align="left" valign="middle" class="first">JSON-RPC URL:</td>
                                            <td align="left" valign="middle"><input type="text" name="json_rpc_url" value="" /></td>
                                        </tr>
                                    </table>

                                    <p>
                                        <input type="checkbox" id="is_signing_authority" name="is_signing_authority" /><label for="is_signing_authority">This certificate is for use as a Signing Authority</label>
                                    </p>
                                </div>
                            </form>


                        </div>
                    </div>
                </td>
            </tr>
        </table>

  
        <div id="footer-bar"></div>
    </body>
</html>
