<script type="text/javascript">

Ext.onReady(function(){

    var xg = Ext.grid;

    var reader = new Ext.data.ArrayReader({}, [
       {name: 'name'},
       {name: 'domain'},
       {name: 'website'},
       {name: 'fingerprint'},
       {name: 'reciprocal'},
       {name: 'date_signed', type: 'date', dateFormat: 'n/j h:ia'},
    ]);

    var store = new Ext.data.GroupingStore({
        reader: reader,
        data: xg.lv_data,
        sortInfo:{field: 'name', direction: "ASC"},
        groupField:'reciprocal'
    });
    
    var rsmod = new Ext.grid.RowSelectionModel({
        singleSelect:true
    });
    rsmod.on('rowselect',  function(a,idx) {
    });

    var grid = new xg.GridPanel({
        store: store,
        columns: [
            {id:'name',header: "Name", width: 40, sortable: true, dataIndex: 'name'},
            {header: "Domain", width: 25, sortable: true, dataIndex: 'domain'},
            {header: "Website", width: 40, sortable: true, dataIndex: 'website'},
            {header: "Fingerprint", width: 20, sortable: true, dataIndex: 'fingerprint'},
            {header: "Trust Reciprocated", width: 20, sortable: true, dataIndex: 'reciprocal'},
            {header: "Date Signed", width: 20, sortable: true, renderer: Ext.util.Format.dateRenderer('Y-m-d'), dataIndex: 'date_signed'}
        ],
        sm: rsmod,
        pruneModifiedRecords : true,
        view: new Ext.grid.GroupingView({
            forceFit:true,
            groupTextTpl: '{text} ({[values.rs.length]} {[values.rs.length > 1 ? "Items" : "Item"]})'
        }),
        frame:false,
        width: 'auto',
        height: 450,
        collapsible: false,
        animCollapse: false,
        iconCls: 'icon-grid',
        bbar : false,
        fbar: false,
        header: false,
        border: true,
        stripeRows: true,
        fbar  : [
            '->', {
            text:'Revoke',
            handler : function() {
                var item = grid.getSelectionModel().getSelected();
                if (confirm("Are you sure you want to revoke the certificate '" + item.data.name + "'?")) {
                    // TODO: Revoke and reconstruct certificate etc.
                    store.remove(item);
                } else {
                    return false;
                }
            }}
        ],
        renderTo: document.getElementById('listview')
    });
});


/*
            Ext.Ajax.request({
            url: 'data/EmployeeRecords.json'
                ,method: 'GET'
                ,success: function(conn, response, options) {
                    data = Ext.util.JSON.decode(conn.responseText);
                    emp = data.results;

                    store.loadData(emp);

                }
            });*/
/*
*
var new_data = [['data3','data4'], ['data5','data6']];

for (var i = 0, len = new_data.length; i < len; i++) {
    datastore.add(new datastore.recordType({
           Col1: new_data[0],
           Col2: new_data[1]
        })
    );
}
*/


Ext.grid.lv_data = [
    ['EZTV', 'eztv.it', 'http://www.eztv.it', 'xyz123', 'Yes', '03/03 12:00am'],
    ['isoHunt', 'isohunt.com', 'http://www.isohunt.com', 'xyz123', 'Yes', '02/03 12:00am'],
    ['Torrentz', 'torrentz.eu', 'http://www.torrentz.eu', 'xyz123', 'No', '03/05 12:00am']];

// Add list view data
for(var i = 0; i < Ext.grid.lv_data.length; i++){
    Ext.grid.lv_data[i].push('the data');
}
</script>
<h2>Manage Certificates</h2>
<div class="body">

    <p>These are the certificates you have signed and trusted and certificates that have signed and trusted you (and you approve). If you revoke a certificate its entry in your certificate will be removed and the other certificate authorities notified.</p>
   
    <div id="listview" class="extjs"></div>
 

    <p><?php //print str_repeat("&nbsp; ", 1000) ?></p>
</div>