const deleteButtons = document.querySelectorAll('.delete-button');
const DELETE_API_URL = './deleteTask.php';
const MARK_DONE_API_URL = './markDone.php';
const MARK_NOT_DONE_API_URL = './markNotDone.php';
const EDIT_API_URL = './editTask.php';

for(let i = 0; i < deleteButtons.length; ++i) {
	deleteButtons[i].addEventListener('click', async () => {
		try {
			const response = await axios.delete(DELETE_API_URL, { data: { id: deleteButtons[i].getAttribute('id') } });
			location.reload();
		} catch(err) {
			console.log(err);
		}
	});
}


//const markDoneButtons = document.querySelectorAll('.mark-done-button');
//
//for(let i = 0; i < markDoneButtons.length; ++i) {
//	markDoneButtons[i].addEventListener('click', )
//}

//$(".mark-done-button").on('click', async () => {
//	try {
//		const response = await axios.put(MARK_DONE_API_URL, { done: 1, id:  });
//		location.reload();
//	} catch(err) {
//		console.log(err);
//	}
//})

$(document).ready(e => {
	$('.mark-done-button').on('click', async function() {
		try {
			const response = await axios.put(MARK_DONE_API_URL, { done: 1, id: $(this).attr('id') });
			location.reload();
		} catch(err) {
			console.log(err);
		}
	})

	$('.mark-not-done-button').on('click', async function() {
		try {
			const response = await axios.put(MARK_NOT_DONE_API_URL, { done: 0, id: $(this).attr('id') });
			location.reload();
		} catch(err) {
			console.log(err);
		}
	})

	$('#submitEditButton').on('click', async function() {
		try {
			const response = await axios.put(EDIT_API_URL, { newTask: $('#newTaskInput').val(), id: $('#newTaskInput').attr('data-row-id') });
			location.reload();
		} catch(err) {
			console.log(err);
		}
	})
})