<h2>Create a Certificate</h2>
<div class="body">
    <p>This page allows you to create a new certificate along with a newly generated key pair. This can be used to create certificates for others or to setup the initial certificate that will be used by this Signing Authority.</p>

    <form>
        <div class="outline">
            <h3>Certificate Fields</h3>
            <div class="body">
                <table>
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