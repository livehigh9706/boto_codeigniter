$(document).ready(function() {
	$(".menu li").each(function() {
		let index = $(this).index();
		$(this)
			.on("mouseenter focusin", function() {
				$(this).addClass("on");
				$(".sub_wrap").addClass("on");
				$(".sub_wrap li").hide();
				$(".sub_wrap li:eq(" + index + ")").show();
				return false;
			})
			.on("mouseleave focusout", function() {
				$(".menu li").removeClass("on");
			});
	});
	$(".sub_wrap")
		.on("mouseenter focusin", function() {})
		.on("mouseleave focusout", function() {
			$(".sub_wrap").removeClass("on");
			$(".sub_wrap li").hide();
		});
});

function write_comment(writer, post_id) {
	var content = $(".comment_form textarea")
		.val()
		.trim();
	if (content == "") {
		alert("내용을 입력하여주십시오.");
		return;
	}
	$.ajax({
		url: "comment",
		type: "POST",
		data: { mode: "write", writer: writer, post_id: post_id, content: content },
		success: function(data) {
			location.reload();
		}
	});
}

function delete_comment(comment_id) {
	if (confirm("정말 삭제하시겠습니까?")) {
		$.ajax({
			url: "comment",
			type: "POST",
			data: { mode: "delete", id: comment_id },
			success: function(data) {
				location.reload();
			}
		});
	}
}
