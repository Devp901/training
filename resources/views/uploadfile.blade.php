<html>

<body>
    <?php
    echo Form::open(['url' => '/uploadfile', 'files' => 'true']);
    echo 'Select the file to upload.';
    echo Form::file('image');
    echo Form::submit('Upload File');
    echo Form::close();
    ?>
</body>

</html>
