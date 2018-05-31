<?php 

# TODO: questa pagina recupera la lista delle posizioni con una GET JSON AJAX e poi la renderizza usando JS

?>

<?php require "header.php"; ?>

<section class="section">
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>lat</th>
                    <th>lon</th>
                    <th>time</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</section>

<script>
$.get(
    'api-position.php',
    function(data) {
        console.log(data);
        $.each(data, function(i,e){
            $('table tbody').append('<tr><td>'+e.id+'</td><td>'+e.user+'</td><td>'+e.lat+'</td><td>'+e.lon+'</td><td>'+e.datetime+'</td></tr>')
        });
    }
);
</script>

<?php require "footer.html"; ?>
