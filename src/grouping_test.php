
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Grid3 Grouping Example</title>

    <link rel="stylesheet" type="text/css" href="js/extjs/resources/css/ext-all.css" />

    <!-- GC -->
    <!-- LIBS -->
    <script type="text/javascript" src="js/extjs/adapter/ext/ext-base.js"></script>
    <!-- ENDLIBS -->

   <!-- <script type="text/javascript" src="js/extjs/ext-all-debug.js"></script> -->
<script type="text/javascript" src="js/extjs/ext-all.js"></script>

    <script type="text/javascript">

        Ext.onReady(function(){

        //Ext.QuickTips.init();

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

            frame:true,
            width: 700,
            height: 450,
            collapsible: true,
            animCollapse: false,
            title: 'Trusted Certificates',
            iconCls: 'icon-grid',
            fbar  : ['->', {
                text:'Clear Grouping',
                iconCls: 'icon-clear-group',
                handler : function(){
                    store.clearGrouping();
                }
            }],
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
    <link rel="stylesheet" type="text/css" href="grid-examples.css" />

    <!-- Common Styles for the examples -->
    <link rel="stylesheet" type="text/css" href="js/extjs/shared/examples.css" />

    <style type="text/css">
        body .x-panel {
            margin-bottom:20px;
        }
        .icon-grid {
            background-image:url(js/extjs/shared/icons/fam/grid.png) !important;
        }
        .icon-clear-group {
            background-image:url(js/extjs/shared/icons/fam/control_rewind.png) !important;
        }
        #button-grid .x-panel-body {
            border:1px solid #99bbe8;
            border-top:0 none;
        }
        .add {
            background-image:url(js/extjs/shared/icons/fam/add.gif) !important;
        }
        .option {
            background-image:url(js/extjs/shared/icons/fam/plugin.gif) !important;
        }
        .remove {
            background-image:url(js/extjs/shared/icons/fam/delete.gif) !important;
        }
        .save {
            background-image:url(js/extjs/shared/icons/save.gif) !important;
        }
    </style>
</head>
<body>

    <div id="listview"></div>

</body>
</html> 