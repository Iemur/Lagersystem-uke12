<?php
    include('../config/session.php');
    $sql = "SELECT id, eske_nummer FROM esker";
    $result = $db->query($sql);
?>
<select id="eskeid" class="form-control" name="eskeid" required>
    <option selected value="">Eske...</option>
    <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) : ?>
    <option value="<?php echo $row['id']; ?>"><?php echo $row['eske_nummer']; ?></option>
    <?php endwhile; ?>
</select>
