
<?php echo '<?xml version="1.0" encoding="UTF-8" ?>'?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc><?php echo base_url();?></loc>
        <priority>1.0</priority>
    </url>
    <?php foreach ($news as $row){ ?>
        <url>
            <loc><?php echo base_url('tin-tuc'.create_slug($row->name).'-'.$row->id);?></loc>
            <priority>0.5</priority>
        </url>
    <?php }?>
</urlset>