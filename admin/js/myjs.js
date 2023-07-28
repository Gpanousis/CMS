
// $(document).ready(function($){
//   // $("p").click(function(){
//   //   $(this).hide();
//   // });
//   alert("hello");
// });


$(document).ready(function($){
  $('.multiple-select-categories').select2();

  $('.multiple-select-tags').select2({
    tags: true
  });

});






$("tr.table_element_hover_effect").hover(
  
  function () {
    $(this).find(".hidden_table_settings").css('opacity','1');
  }, 
  function () {
    $(this).find(".hidden_table_settings").css('opacity','0');
  }
);



$(".edit-cat-btn").click(function(event) {
  var $target = $(event.target).parent().parent().prev();

  var $tartext = $target.text();
  var $tarid = $target.attr('category_id');

  var cat_hidden_form = "<div class='parent-cat-form-element'>"
  +"<form cat_form_id='cat_form_"+$tarid+"' class='cat_name_table_form' action='categories.php' method='post'>"
  +"<div class='form-group'>"
    +  "<input class='form-control' type='text' name='category_rename' value='"+$tartext+"'>"
    +"<input type='hidden' name='category_rename_id' value='"+$tarid+"' />"
  +"</div>"
  +"<div class='form-group'>"
  +"<input class='btn btn-primary ancel_cat_update' type='submit' name='category_rename_update'  value='Update'>"
  +"</div>"
  
+"</form>"
+"<div class='close_update_inpt'>"
  +"<a href='categories.php' class='cancel_cat_update'>"
  +"<i class='fa fa-close' data-toggle='tooltip' data-placement='bottom' title='Cancel'  ></i>"
  +"</a>"
  +"</div></div>";
  
  $target.replaceWith( cat_hidden_form );
 
// $($target).append("hello");
       
});


function confirmDelete(delUrlid) {
  let delUrl = window.location.href;
  let result = delUrl.split('?')[0];

  delUrl = result + '?delete=' + delUrlid;
  if (confirm("Are you sure you want to delete this category?")) {
    
    document.location = delUrl;
  
  }
}

function editThisPost(editUrlid) {

  let editUrl = window.location.href;
  let result = editUrl.split('?')[0];

  editUrl = result + '?source=edit_post&post_id=' + editUrlid;

  document.location = editUrl;

}



function reloadThisPage(){
  location.reload(true);
}
// function updateCatName(catid){
//   var updateUrl = "categories.php?update=" + catid;
//   $(".cat_name_table_form").attr('cat_form_id','cat_form_id_'+catid).submit();
// }