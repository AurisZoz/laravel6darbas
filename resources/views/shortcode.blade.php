<form action "/shortcode" method="POST">
    @csrf
    <label for="autonumber"> Autonumber: </label>
    <input type="text" name="autonumber"></br>
    <label for="string"> String: </label>
    <input type="text" name="string"></br>
    <textare name="replace" cols="30" rows="10"> </textarea>
    <button>Send</button>
</form>