
/* The sortCompleteCallback does nothing but call the pagination object below, passing in the table id */
function Repaginate() {
        tablePaginater.init();
}

/* This is the JS object that paginates the table (N.B: Tables do not have to be sortable to use this object) */
var tablePaginater = {
        tableInfo: {},
        
        init: function() {
                var tables = document.getElementsByTagName('table');
                
                for(var t = 0, tbl; tbl = tables[t]; t++) {
                        if(!tbl.id || tbl.id == "" || tbl.className.search(/paginate-([0-9]+)/) == -1) continue;

                        tablePaginater.tableInfo[tbl.id] = {
                                rowsPerPage:tbl.className.match(/paginate-([0-9]+)/)[1],
                                currentPage:0
                        };
                        
                        tablePaginater.showPage(tbl.id, 0);
                        tablePaginater.createPageinationList(tbl.id);
                };
        },
        
        addClass: function(e,c) {
                if(new RegExp("(^|\\s)" + c + "(\\s|$)").test(e.className)) return;
                e.className += ( e.className ? " " : "" ) + c;
        },

        removeClass: function(e,c) {
                e.className = !c ? "" : e.className.replace(new RegExp("(^|\\s*\\b[^-])"+c+"($|\\b(?=[^-]))", "g"), "");
        },
        
        /* I shall leave it as an excercise for the reader to create the next|prev links commonly
           found within such pagination systems. I'm just creating a simple linked list for the moment. */
        createPageinationList: function(tableId) {
        	
        				var el = document.getElementById('paginateList' + tableId);
        				/*var el = document.getElementsByName("paginateList");*/
        				
        				if(el) {
								el.parentNode.removeChild(el);
								}
								
                var tbl = document.getElementById(tableId);
        
                var ul = document.createElement("ul");
                ul.setAttribute("name", "paginateList");
                ul.className = "tablePaginater";
                ul.id = "paginateList-" + tableId;
                
                var rows = tablePaginater.getTableRows(tableId);
                
                var total = rows.length;
                var rowsPerPage
                var pages = Math.max(1, Math.ceil(total / tablePaginater.tableInfo[tableId].rowsPerPage));
                
                var li = document.createElement("li");
                var a  = document.createElement("a");
                a.href = "#";
                
                var lic, ac;
                
                for(var i = 0; i < pages; i++) {
                        lic = li.cloneNode(false);
                        ac  = a.cloneNode(true);
                        ac.title = "View page " + (i + 1);
                        ac.appendChild(document.createTextNode(i+1));
                        lic.onclick = a.onclick = tablePaginater.show;
                        lic.appendChild(ac);
                        
                        if(i == 0) lic.className = "currentPage";

                        ul.appendChild(lic);
                };
                
                if(tbl.nextSibling) {
                        tbl.parentNode.insertBefore(ul, tbl.nextSibling);
                } else {
                        tbl.parentNode.appendChild(ul);
                };
        },
        
        getTableRows: function(tableId) {
                var rows = [];
                var tbl = document.getElementById(tableId);
                
                var tbody = tbl.getElementsByTagName('tbody');

                if(tbody && tbody.length) {
                        tbody = tbody[0];
                        rows = tbody.getElementsByTagName('tr');
                } else {
                        var tmp = tbl.getElementsByTagName('tr');
                        for(var i = tmp.length; i--;) {
                                if(tmp[i].getElementsByTagName('th')) continue;
                                rows[rows.length] = tmp[i];
                        };
                };
                return rows;
        },
        
        showPage: function(tableId, page) {
                if(!(tableId in tablePaginater.tableInfo)) return;
                
                var tbl = document.getElementById(tableId);
                var rowsPerPage = tablePaginater.tableInfo[tableId].rowsPerPage;
                var rows = tablePaginater.getTableRows(tableId);
                
                page = typeof page == "undefined" ? tablePaginater.tableInfo[tableId].currentPage : page;

                var min = rowsPerPage * page;
                var max = Number(min) + Number(rowsPerPage);
                var rowStyle = tbl.className.search(/rowstyle-([\S]+)/) != -1 ? tbl.className.match(/rowstyle-([\S]+)/)[1] : false;
                var cnt = 0;
                var len = rows.length;
                
                for(var i = 0; i < len; i++) {
                        rows[i].style.display = (i >= min && i < max) ? "" : "none";
                        if(rowsPerPage % 2 && rowStyle && i >= min && i < max) {
                                tablePaginater.removeClass(rows[i], rowStyle);
                                if(cnt++ % 2) tablePaginater.addClass(rows[i], rowStyle);
                        };
                };
                
                tablePaginater.tableInfo[tableId].currentPage = page;
        },

        /* Event handler for the li|a click event */
        show: function() {
                var tableId = this.parentNode.id.replace("paginateList-", "");
                var cnt = 0;
                var li = this;
                while(li.previousSibling) {
                        li = li.previousSibling;
                        if(li.tagName && li.tagName.toLowerCase() == "li") cnt++;
                };
                
                tablePaginater.showPage(tableId, cnt);

                var ul = this.parentNode;
                var i = 0;
                while(ul.childNodes[i]) {
                        ul.childNodes[i].className = i == cnt ? "currentPage" : "";
                        i++;
                };
                return false;
        }
}

/*fdTableSort.addEvent(window, "load", tablePaginater.init);*/

/* Changes rows displayed per page */
function rowsDisplayed(o,c1,c2)
{
    	var viewNum=o.className;
    	var display=viewNum.replace(c1, c2);
      o.className="sortable paginate-"+display;
}