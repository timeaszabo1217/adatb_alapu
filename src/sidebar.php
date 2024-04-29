<div class="sidebar">
    <h2>Szűrési lehetőségek</h2>
    <form method="get" action="konyvek.php">
        <label for="author">Szerző:</label>
        <select name="author" id="author">
            <option value="szerzo1">Szerző 1</option>
            <option value="szerzo2">Szerző 2</option>
            <!-- Itt folytathatod a szerzők felsorolását -->
        </select>
        <br>
        <label for="genre">Műfaj:</label>
        <select name="genre" id="genre">
            <option value="mufaj1">Műfaj 1</option>
            <option value="mufaj2">Műfaj 2</option>
            <!-- Itt folytathatod a műfajok felsorolását -->
        </select>
        <br>
        <input type="submit" value="Szűrés">
    </form>
</div>
