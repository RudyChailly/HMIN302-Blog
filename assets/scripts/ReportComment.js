const $ = require('jquery');

/*function reportCommentOnSubmit(comment) {
    $('#commentTargetId').val(comment);
}*/
$('.reportCommentButton').click(function (){
    let commentId = this.id.split('-')[1];
    $('#report_comment_target').val(commentId);
    let contentDiv = $('#comment-content-'+commentId);
    let contentP = contentDiv.children()[0].innerHTML;

    $('#form-report-comment-content > p').html(contentP);
    //$('#commentReportModal').show();
})