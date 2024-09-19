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

	$('.edit-task-button').on('click', async function() {
		$id = $(this).attr('id');
		$('.submit-edit-button').on('click', async function() {
			try {
				const response = await axios.put(EDIT_API_URL, { newTask: $('.new-task-input').val(), id: $id });
				location.reload();
			} catch(err) {
				console.log(err);
			}
		})
	})
})