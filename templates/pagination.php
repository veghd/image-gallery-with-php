<nav>
    <ul class="pagination">
        <li class="page-item"><a class="page-link" href="?size=<?=$size?>&$page=<?=$page-1?>">Prev</a></li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">...</a></li>
        <li class="page-item"><a class="page-link" href="?size=<?=$size?>&$page=<?=$page-1?>"><?=$page-1?></a></li>
        <li class="page-item active"><a class="page-link" href="#"><?=$page?></a></li>
        <li class="page-item"><a class="page-link" href="?size=<?=$size?>&$page=<?=$page+1?>"><?=$page+1?></a></li>
        <li class="page-item"><a class="page-link" href="#">...</a></li>
        <li class="page-item"><a class="page-link" href="#">7</a></li>
        <li class="page-item"><a class="page-link" href="?size=<?=$size?>&$page=<?=$page+1?>">Next</a></li>
    </ul>
</nav>