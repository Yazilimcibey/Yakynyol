</div>
</div>
<?php

# code...
echo "<div style='float:right; width:20%; border-left:1px solid grey'>";
$kayit = mysqli_query($baglan, "select * from reklamalar order by rand() limit 15");
while ($ad = mysqli_fetch_array($kayit)) {
    $surat = $ad['surat'];
    echo "<a href='$ad[link]'>
  <img src='$surat' alt=$surat width=100% height=200px></a>
  ";
}
echo "</div>"; ?></div>
</section>
<footer id="footer" style='height:30px'>
    <div class="box-top">
        <div class="inner">
            <div class="box-left">
                <p class="follow">
                    <strong>Follow us</strong>
                    <a class="text-black" rel="noopener" href="https://www.facebook.com/awwwards/" target="_blank">Facebook</a>
                    <a class="text-black" rel="noopener" href="https://www.youtube.com/channel/UCYWGYef22gx8PaXZMLHAQsw?sub_confirmation=1" target="_blank">Youtube</a>
                    <a class="text-black" rel="noopener" href="https://www.instagram.com/awwwards" target="_blank">Instagram</a>
                </p>
            </div>

        </div>
    </div>
</footer>

</body>

</html>