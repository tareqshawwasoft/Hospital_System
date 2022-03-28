<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>using API</title>
</head>

<body>

    <div class="container my-5">
        <button class="btn btn-success" id="load-data">Load Data</button>

        <div class="data-wrapper">

        </div>

    </div>

    <script>
        $('#load-data').click(function() {
            $('#load-data').prop('disabled', true);
            // get all posts from url

            $.ajax({
                type: 'get',
                url: 'https://jsonplaceholder.typicode.com/posts',
                success: function(res) {
                    // console.log(res);
                    res.forEach(el => {
                        // res.forEach(function(el) {
                        console.log(el);

                        var card = `<div class="card mb-4">
                            <div class="card-header">
                                ${el.title}
                            </div>
                            <div class="card-body">
                                ${el.body}
                            </div>
                            </div>`;

                        $('.data-wrapper').append(card);
                    });

                    $('#load-data').prop('disabled', false);
                }
            })
            // dispaly all posts in div
        })
    </script>

</body>

</html>
