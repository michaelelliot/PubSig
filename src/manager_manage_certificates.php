<script type="text/javascript">

    Ext.onReady(function(){

    var xg = Ext.grid;

    // shared reader
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

        /*
         title: 'Trusted Certificates',
        fbar  : ['->', {
            text:'Clear Grouping',
            iconCls: 'icon-clear-group',
            handler : function(){
                store.clearGrouping();
            }
          
        }],*/
        renderTo: document.getElementById('listview')
    });


  
});

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

    <p>These are certificates that you have signed and trusted and certificates that have signed and trusted you (and you approve).</p>
    <p>
    <div id="listview" class="extjs"></div>
     </p>

    <p><?php //print str_repeat("&nbsp; ", 1000) ?></p>
</div>