const deleteButtons = document.querySelectorAll('.delete-button');
const API_URL = 'https://localhost/projects/todo_list/deleteTask.php';

for(let i = 0; i < deleteButtons.length; ++i) {
	deleteButtons[i].addEventListener('click', async () => {
		try {
			const response = await axios.delete(API_URL, { data: { id: deleteButtons[i].getAttribute('id') } });
			location.reload();
		} catch(err) {
			console.log(err);
		}
	});
}
