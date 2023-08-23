function loadall() {
  load_data();
  load_files();
  load_storage();
  load_input_tag();
}

//refresh button
$(".refresh").click(function () {
  loadall();
});

function load_data(tag_search) {
  $.ajax({
    method: "POST",
    url: "./data/tampil_tagar_sidebar.php",
    data: {
      tag_search: tag_search
    },
    success: function (hasil) {
      $('#datags').html(hasil);
    }
  });
}

function load_input_tag() {
  $.ajax({
    method: "POST",
    url: "./data/tag.php",
    data: {
      nodata: "datano"
    },
    success: function (hasil) {
      $('#tag').html(hasil);
    }
  });
}

function load_files(search, col = $("#sortby").val(), asdesc = $("#asdesc").val(), tag = $("#tagSelected").val()) {
  search = $("#search").val();
  $.ajax({
    method: "POST",
    url: "./data/files.php",
    data: {
      search: search,
      col: col,
      asdesc: asdesc,
      tag: tag
    },
    success: function (hasil) {
      $('#files').html(hasil);
      setTimeout(() => { 
        $(".select-all-checkbox").multiselectCheckbox({
          checkboxes: ".tablex .select-checkbox",
          sync: ".tablex .rowx"
        });
      }, 1000);
    }
  });
}

// SORTING
function sort(col, asdesc) {
  load_files(undefined, col, asdesc, undefined);
}
 
// tag
function useTag(tag) {
  load_files(undefined, undefined, undefined, tag);
}
function removeTag() {
  load_files(undefined, undefined, undefined, "");
}

// Storage sisa penyimpanan
function load_storage() {
  $.ajax({
    method: "GET",
    url: "./data/storage.php",
    data: {
      minta: "BAGI WOI DATA NYA"
    },
    success: function (hasil) {
      $('#storage').html(hasil);
    }
  });
}

$(document).ready(function () {
  loadall();
  // setInterval(function(){
  //   loadall();
  // }, 1000);
});

// CRUD
// upload
$('#dataUpload').on('submit', function (e) {
  e.preventDefault();
  var formData = new FormData(this);
  $.ajax({
    url: './aksi.php?tambah',
    method: 'POST',
    data: formData,
    contentType: false,
    processData: false,
    success: function (h) {
      $('#pesan').html(h);
      loadall();
      $('#dataUpload').get(0).reset();
    }
  });
});

// delete
function deleteFile(id) {
  if (confirm('apakah kamu yakin menghapus file ini?') == true) {
    $.ajax({
      url: './aksi.php?hapus',
      method: 'POST',
      data: {
        "id[]": id
      },
      success: function (h) {
        $('#pesan').html(h);
        load_files();
      }
    });
  }
}

// deleteMany
$("#deleteMany").click(function () {
  if (confirm('apakah kamu yakin menghapus beberapa file ini?') == true) {
    var id = $('input[name="pilih[]"]:checked').map(function () {
      return $(this).val();
    }).get();
    $.ajax({
      url: './aksi.php?hapus',
      method: 'POST',
      data: {
        id: id
      },
      success: function (h) {
        $('#pesan').html(h);
        load_files();
      }
    });
  }
});

// share
function share(nama, id) {
  $.ajax({
    url: './aksi.php?shareit=',
    method: 'POST',
    data: {
      "id": id
    },
    success: function (h) {
      $('#pesan').html(h);
      loadall();
    }
  });
}
function stopShare(nama, id) {
  $.ajax({
    url: './aksi.php?shareit=',
    method: 'POST',
    data: {
      "id": id
    },
    success: function (h) {
      $('#pesan').html(h);
      loadall();
    }
  });
}


// SEARCH
$('#tag_search').keyup(function () {
  var tag_search = $("#tag_search").val();
  load_data(tag_search);
});

$('#search').keyup(function () {
  load_files();
});

