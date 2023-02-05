getPagination('#hiuTable');

function getPagination(table) {
  var lastPage = 1;

  $('#maxRows')
    .on('change', function(evt) {
      //$('.paginationprev').html('');						// reset pagination

     lastPage = 1;
      $('.pagination')
        .find('li')
        .slice(1, -1)
        .remove();
      var trnum = 0; // reset tr counter
      var maxRows = parseInt($(this).val()); // get Max Rows from select option

      if (maxRows == 5000) {
        $('.pagination').hide();
      } else {
        $('.pagination').show();
      }

      var totalRows = $(table + ' tbody tr').length; // numbers of rows
      $(table + ' tr:gt(0)').each(function() {
        // each TR in  table and not the header
        trnum++; // Start Counter
        if (trnum > maxRows) {
          // if tr number gt maxRows

          $(this).hide(); // fade it out
        }
        if (trnum <= maxRows) {
          $(this).show();
        } // else fade in Important in case if it ..
      }); //  was fade out to fade it in
      if (totalRows > maxRows) {
        // if tr total rows gt max rows option
        var pagenum = Math.ceil(totalRows / maxRows); // ceil total(rows/maxrows) to get ..
        //	numbers of pages
        for (var i = 1; i <= pagenum; ) {
          // for each page append pagination li
          $('.pagination #prev')
            .before(
              '<li data-page="' +
                i +
                '">\
								  <span class="f page-link">' +
                i++ +
                '<span class="sr-only">(current)</span></span>\
								</li>'
            )
            .show();
        } // end for i
      } // end if row count > max rows
      $('.pagination [data-page="1"]').attr('class','active'); // add active class to the first li

      $('.pagination li').on('click', function(evt) {
        // on click each page
        evt.stopImmediatePropagation();
        evt.preventDefault();
        var pageNum = $(this).attr('data-page'); // get it's number

        var maxRows = parseInt($('#maxRows').val()); // get Max Rows from select option

        if (pageNum == 'prev') {
          if (lastPage == 1) {
            return;
          }
          pageNum = --lastPage;
        }
        if (pageNum == 'next') {
          if (lastPage == $('.pagination li').length - 2) {
            return;
          }
          pageNum = ++lastPage;
        }

        lastPage = pageNum;
        var trIndex = 0; // reset tr counter
        $('.pagination li').removeClass('active'); // remove active class from all li
        $('.pagination [data-page="' + lastPage + '"]').addClass('active'); // add active class to the clicked
        // $(this).addClass('active');					// add active class to the clicked
	  	limitPagging();
        $(table + ' tr:gt(0)').each(function() {
          // each tr in table not the header
          trIndex++; // tr index counter
          // if tr index gt maxRows*pageNum or lt maxRows*pageNum-maxRows fade if out
          if (
            trIndex > maxRows * pageNum ||
            trIndex <= maxRows * pageNum - maxRows
          ) {
            $(this).hide();
          } else {
            $(this).show();
          } //else fade in
        }); // end of for each tr in table
      }); // end of on click pagination list
	  limitPagging();
    })
    .val(5)
    .change();

  // end of on select change

  // END OF PAGINATION
}

function limitPagging(){
	// alert($('.pagination li').length)

	if($('.pagination li').length > 7 ){
			if( $('.pagination li.active').attr('data-page') <= 3 ){
			$('.pagination li:gt(5)').hide();
			$('.pagination li:lt(5)').show();
			$('.pagination [data-page="next"]').show();
		}if ($('.pagination li.active').attr('data-page') > 3){
			$('.pagination li:gt(0)').hide();
			$('.pagination [data-page="next"]').show();
			for( let i = ( parseInt($('.pagination li.active').attr('data-page'))  -2 )  ; i <= ( parseInt($('.pagination li.active').attr('data-page'))  + 2 ) ; i++ ){
				$('.pagination [data-page="'+i+'"]').show();

			}

		}
	}
}

$(function() {
  // Just to append id number for each row
  $('table tr:eq(0)').prepend('<th> ID </th>');

  var id = 0;

  $('table tr:gt(0)').each(function() {
    id++;
    $(this).prepend('<td>' + id + '</td>');
  });
});

//  Developed By Yasser Mas
// yasser.mas2@gmail.com
$('.pagination li').addClass("page-item");
$('.pagination li span.f').addClass("page-link");
$('.pagination > li:first-child > span').addClass("page-link");
$('.pagination > li:last-child > span').addClass("page-link");
$('.pagination > li:nth-child(2)').addClass("active");


// Header Sort
var numericRegExp = new RegExp('^((?:NaN|-?(?:(?:\\d+|\\d*\\.\\d+)(?:[E|e][+|-]?\\d+)?|Infinity)))$')

function isNumeric (value) {
  return numericRegExp.test(String(value))
}

function toArray (value) {
  if (!value) {
    return []
  }
  
  if (Array.isArray(value)) {
    return value
  }
  
  if (value instanceof window.NodeList || value instanceof window.HTMLCollection) {
    return Array.prototype.slice.call(value)
  }
  
  return [ value ]
}

function sortTable (table, ordering) {
  var thead = table.querySelector('thead')
  var tbody = table.querySelector('tbody')
  var rows = toArray(tbody.rows)
  var headers = toArray(thead.rows[0].cells)

  var current = toArray(thead.querySelectorAll('.sorting_desc, .sorting_asc'))
  
  current.filter(function (item) { return !!item }).forEach(function (item) {
    item.classList.remove('sorting_desc')
    item.classList.remove('sorting_asc')
  })
  
  headers.filter(function (item) { return !!item }).forEach(function (header) {
    header.classList.remove('sorting_desc')
    header.classList.remove('sorting_asc')
  })
  
  ordering.forEach(function (order) {
    var index = order.idx
    var direction = order.dir || 'asc'
    
    var header = headers[index]
    header.classList.add('sorting_' + direction)
  })
  
  rows.sort(function sorter (a, b) {
    var i = 0
    var order = ordering[i]
    var length = ordering.length
    var aText
    var bText
    var result = 0
    var dir
    
    while (order && result === 0) {
      dir = order.dir === 'desc' ? -1 : 1
      aText = a.cells[order.idx].textContent.trim()
      bText = b.cells[order.idx].textContent.trim()

      if (isNumeric(aText) && isNumeric(bText)) {
        result = dir * (parseFloat(aText) - parseFloat(bText))
      } else {
        result = dir * aText.localeCompare(bText)
      }
      
      i += 1
      order = ordering[i]
    }
    
    return result
  }).forEach(function each (row) {
    tbody.appendChild(row)
  })
}

function find (array, predicate) {
  return toArray(array).filter(predicate)[0]
}

function initSortTable (table) {
  var thead = table.querySelector('thead')
  var ordering = [{idx:0,dir:'asc'},{idx:0,dir:'asc'}]
  
  sortTable(table, ordering)
  table.__ordering = ordering
  
  thead.addEventListener('click', function onClick (event) {
    var src = event.target || event.srcElement
    var tagName = src.tagName.toLowerCase()
    
    if (tagName !== 'th') {
      return
    }
    
    if (!event.shiftKey) {
      table.__ordering = [
        {
          idx: src.cellIndex,
          dir: src.classList.contains('sorting_asc') ? 'desc' : 'asc'
        }
      ]
    } else {
      var order = find(table.__ordering, function (item) {
        return item.idx === src.cellIndex
      })
      
      if (order) {
        order.dir = order.dir === 'asc' ? 'desc' : 'asc'
      } else {
        table.__ordering.push({
          idx: src.cellIndex,
          dir: 'asc'
        })
      }
    }
    
    sortTable(table, table.__ordering)
  }, false)
}

initSortTable(document.querySelector('table'))


