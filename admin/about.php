<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

include( 'includes/header.php' );

if( isset( $_GET['delete'] ) )
{

  $query = 'DELETE FROM about
    WHERE id = '.$_GET['delete'].'
    LIMIT 1';
  mysqli_query( $connect, $query );

  set_message( 'About has been deleted' );

  header( 'Location: about.php' );
  die();

}

$query = 'SELECT *
  FROM about';
$result = mysqli_query( $connect, $query );

?>

<h2>Manage Anout</h2>

<table>
  <tr>
    <th></th>
    <th align="center">ID</th>
    <th align="left">Name</th>
    <th align="center">Description</th>
    <th></th>
    <th></th>
    <th></th>
  </tr>
  <?php while( $record = mysqli_fetch_assoc( $result ) ): ?>
    <tr>
      <td align="center">
        <img src="image.php?type=about&id=<?php echo $record['id']; ?>&width=300&height=300&format=inside">
      </td>
      <td align="center"><?php echo $record['id']; ?></td>
        <td align="left"> <?php echo htmlentities( $record['name'] ); ?></td>
      <td align="left">
        <small><?php echo $record['description']; ?></small>
      </td>
      <td align="center"><a href="about_photo.php?id=<?php echo $record['id']; ?>">Photo</i></a></td>
      <td align="center"><a href="about_edit.php?id=<?php echo $record['id']; ?>">Edit</i></a></td>
      <td align="center">
        <a href="about.php?delete=<?php echo $record['id']; ?>" onclick="javascript:confirm('Are you sure you want to delete this information?');">Delete</i></a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>

<p><a href="about_add.php"><i class="fas fa-plus-square"></i> Add About </a></p>


<?php

include( 'includes/footer.php' );

?>
