<div style="overflow-x: auto;">

  <table class="table table-bordered table-hover" style="background-color: #FFFFFF;">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Author</th>
        <th scope="col">Title</th>
        <th scope="col">Category</th>
        <th scope="col">Status</th>
        <th scope="col">Image</th>
        <th scope="col">Tags</th>
        <th scope="col">Comments</th>
        <th scope="col">Date</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>

      <?php

      // select all columns form a table
      $sql = "SELECT * FROM posts GROUP BY post_id DESC";
      $select_posts = $conn->query($sql);



      // output data of each row
      while ($row = $select_posts->fetch_assoc()) {
        $post_id = $row["post_id"];
        $post_author = $row["post_author"];
        $post_title = $row["post_title"];
        $post_category_id = $row["post_category_id"];
        $post_status = $row["post_status"];
        $post_image = $row["post_image"];
        $post_tags = $row["post_tags"];
        $post_comment_count = $row["post_comment_count"];
        $post_date = $row["post_date"];

        echo "<tr>";
        echo "<td>$post_id</td>";
        echo "<td>$post_author</td>";
        echo "<td>$post_title</td>";
        echo "<td>$post_category_id</td>";

        echo "<td>$post_status</td>";
        echo "<td><img src='../images/$post_image' alt='image' width='200 !important'></td>";
        echo "<td>$post_tags</td>";
        echo "<td>$post_comment_count</td>";
        echo "<td>$post_date</td>";
        echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
        echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";
        echo "</tr>";
      }
      ?>

      <?php
      if (isset($_GET['delete'])) {
        $the_post_id = $_GET['delete'];

        $sql = "DELETE FROM posts WHERE post_id = {$the_post_id}";
        $delete_query = $conn->query($sql);

        header("Location: posts.php");
      }
      ?>

    </tbody>
  </table>
</div>