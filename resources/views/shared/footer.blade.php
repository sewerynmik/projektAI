
<script>
    var successMessage = document.getElementById('successMessage');
    if(successMessage) {
        setTimeout(function() {
            successMessage.classList.add('hide-message');
        }, 5000);
    }

    var errorMessage = document.getElementById('errorMessage');
    if(errorMessage) {
        setTimeout(function() {
            errorMessage.classList.add('hide-message');
        }, 5000);
    }
</script>

<style>
    .hide-message {
        display: none;
    }
</style>

</body>
</html>
