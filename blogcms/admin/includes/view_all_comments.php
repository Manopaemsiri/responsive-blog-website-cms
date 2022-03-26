<div style="overflow-x: auto;">

    <table class="table table-bordered table-hover" style="background-color: #FFFFFF;">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Author</th>
                <th scope="col">Comment</th>
                <th scope="col">Email</th>
                <th scope="col">Status</th>
                <th scope="col">In Response</th>
                <th scope="col">Date</th>
                <th scope="col">Approve</th>
                <th scope="col">Unapprove</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>

            <?php

            // select all columns form a table
            $sql = "SELECT * FROM comments";
            $select_comments = $conn->query($sql);

            // output data of each row
            while ($row = $select_comments->fetch_assoc()) {
                $comment_id = $row["comment_id"];
                $comment_post_id = $row["comment_post_id"];
                $comment_author = $row["comment_author"];
                $comment_content = $row["comment_content"];
                $comment_email = $row["comment_email"];
                $comment_status = $row["comment_status"];
                $comment_date = $row["comment_date"];

                echo "<tr>";
                echo "<td>$comment_id</td>";
                echo "<td>$comment_author</td>";
                echo "<td>$comment_content</td>";
                echo "<td>$comment_email</td>";
                echo "<td>$comment_status</td>";

                $sql = "SELECT * FROM posts WHERE post_id = $comment_post_id";
                $select_post_id_query = $conn->query($sql);
                while ($row = $select_post_id_query->fetch_assoc()) {
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];

                    echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
                }

                echo "<td>$comment_date</td>";

                echo "<td><a href='comments.php?approve=$comment_id'>Approve</a></td>";
                echo "<td><a href='comments.php?unapprove=$comment_id'>Unapprove</a></td>";
                echo "<td><a href='comments.php?delete=$comment_id'>Delete</a></td>";
                echo "</tr>";
            }
            ?>

            <?php

            if (isset($_GET['approve'])) {
                $the_comment_id = $_GET['approve'];

                $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $the_comment_id";
                $approve_comment_query = mysqli_query($conn, $query);

                header("Location: comments.php");
            }


            if (isset($_GET['unapprove'])) {
                $the_comment_id = $_GET['unapprove'];

                $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = $the_comment_id";
                $unapprove_comment_query = mysqli_query($conn, $query);

                header("Location: comments.php");
            }




            if (isset($_GET['delete'])) {
                $the_comment_id = $_GET['delete'];

                $sql = "DELETE FROM comments WHERE comment_id = {$the_comment_id}";
                $delete_query = $conn->query($sql);

                header("Location: comments.php");
            }
            ?>

        </tbody>
    </table>
</div>