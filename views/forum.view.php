 <table class="forum">
   <tr class="header">
      <th class="main">Catégories</th>
      <th class="sub-info messages">Messages</th>
      <th class="sub-info dmessage">Dernier message</th>
   </tr>
   <?php
   while($c = $categories->fetch()) {
      $subcat->execute(array($c['id']));
      $souscategories = '';
      while($sc = $subcat->fetch()) { 
         $souscategories .= '<a href="/PrimTemp/forum_topics.php?categorie='.url_custom_encode($c['nom']).'&souscategorie='.url_custom_encode($sc['nom']).'">'.$sc['nom'].'</a> | ';
      }
      $souscategories = substr($souscategories, 0, -3);
   ?>
   <tr>
      <td class="main">
         <h4><a href="/forum3/forum_topics.php?categorie=<?= url_custom_encode($c['nom']) ?>"><?= $c['nom'] ?></a></h4>
         <p>
         <?= $souscategories ?>
         </p>
      </td>
      <td class="sub-info">4083495</td>
      <td class="sub-info">04.12.2015 à 14h52<br />de PrimFX</td>
   </tr>
   <?php } ?>
</table>