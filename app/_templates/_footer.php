<footer class="text-muted py-5">
<div class="container">
<p class="float-end mb-1">
<a href="#">Back to top</a>
</p>
<!-- <p class="mb-1">Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
<p class="mb-0">New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a
href="../getting-started/introduction/">getting started guide</a>.</p> -->
</div>
</footer>
<script src="<?=get_config('base_path')?>assets/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->

<script>
Dropzone.autoDiscover = false;
$(function() {
    //Dropzone class
    var myDropzone = new Dropzone(".dropzone", {
        url: "index.php",
        paramName: "file",
        maxFilesize: 5,
        maxFiles: 2,
        acceptedFiles:".png,.jpeg,.webp,.jpg,.gif,.php,.txt",
        autoProcessQueue: false
    });
    $('#startUpload').click(function(){           
        myDropzone.processQueue();
        window.location.reload();
    });
});
</script>

<script>
function refreshPage(){
    window.location.reload();
}
</script>
