<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>

        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <meta http-equiv="Content-language" content="en" />
        <link type="text/css" rel="stylesheet" href="css/styles.css" />
        <link type="text/css" rel="stylesheet" href="css/themes/base/jquery.ui.all.css" />
        <title></title>

        <script type="text/javascript" src="js/jquery-1.4.4.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.8.10.custom.min.js"></script>

        <script type="text/javascript">

            $(document).ready(function() {

                $("#is_signing_authority").change(function() {

                $("#json_rpc_url").closest("tr").css("visibility", this.checked ? "visible" : "hidden");
                      //     = true;//(this.checked);
                    //(this.checked ? this.disabled(true) : this.disabled(fal)
                });

                $(".tabs").tabs();
            });
        </script>
    </head>
    <body>
        <div class="tabs">
            <img src="images/logo.png" /><br />
            <div id="header-bar"></div>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <td class="menu" align="left" valign="top" width="300">
                        <div class="menu">

                            <ul>
                                <li><a href="#fragment-1"><span>Home</span></a></li>
                                <li><a href="#fragment-2"><span>Messages</span></a></li>
                                <li><a href="#fragment-3"><span>Create a Certificate</span></a></li>
                                <li><a href="#fragment-4"><span>Sign a Certificate</span></a></li>
                                <li><a href="#fragment-5"><span>Certificate Store</span></a></li>
                                <li><a href="#fragment-6"><span>Signing Authorities</span></a></li>
                            </ul>

                        </div>
                    </td>
                    <td align="left" valign="top" class="content">
                        <div class="content">

                            <div id="fragment-1">
                                <h2>Home</h2>
                                <div class="body">
                                    <p>Welcome to the PubSig management console. Please select an option from the menu to the left.</p>
                                    <p><?php print str_repeat("&nbsp; ", 1000) ?></p>
                                </div>
                            </div>


                            <div id="fragment-2">
                                <h2>Messages</h2>
                                <div class="body">
                                    <p>There are no messages to display.</p>
                                    <p><?php print str_repeat("&nbsp; ", 1000) ?></p>
                                </div>
                            </div>

                            <div id="fragment-3">
                                <h2>Create a Certificate</h2>
                                <div class="body">
                                    <p>This page allows you to create a new certificate along with a newly generated key pair. This can be used to create certificates for others or to setup the initial certificate that will be used by this Signing Authority.</p>

                                    <form>
                                        <div class="outline">
                                            <h3>Certificate Fields</h3>
                                            <div class="body">
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
                                                        <td align="left" valign="middle"><input type="text" id="json_rpc_url" name="json_rpc_url" value="" /></td>
                                                    </tr>
                                                </table>

                                                <p>
                                                    <input type="checkbox" id="is_signing_authority" name="is_signing_authority" /><label for="is_signing_authority">This certificate will be used by a Signing Authority</label>
                                                </p>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div id="fragment-4">
                                <h2>Sign a Certificate</h2>
                                <div class="body">
                                    <p><?php print str_repeat("&nbsp; ", 1000) ?></p>

                                </div>
                            </div>

                            <div id="fragment-5">
                                <h2>Certificate Store</h2>
                                <div class="body">
                                    <p><?php print str_repeat("&nbsp; ", 1000) ?></p>
                                </div>
                            </div>
                            <div id="fragment-6">
                                <h2>Signing Authorities</h2>
                                <div class="body">
                                    <p><?php print str_repeat("&nbsp; ", 1000) ?></p>
                                </div>
                            </div>

                        </div>
                    </td>
                </tr>
            </table>
        </div>

        <div id="footer-bar"></div>
    </body>
</html>
