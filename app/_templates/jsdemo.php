<button type="button" class="btn btn-primary" id="liveToastBtn">Show live toast</button>

<div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
	<div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
		<div class="toast-header">
			<!-- <img src="..." class="rounded me-2" alt="..."> -->
			<strong class="me-auto">Bootstrap</strong>
			<small>11 mins ago</small>
			<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
		</div>
		<div class="toast-body">
			Hello, world! This is a toast message.
		</div>
	</div>
</div>

<script>
const toastTrigger = document.getElementById('liveToastBtn')
const toastLiveExample = document.getElementById('liveToast')
if (toastTrigger) {
	toastTrigger.addEventListener('click', () => {
		const toast = new bootstrap.Toast(toastLiveExample)
		
		toast.show()
	})
}

</script>