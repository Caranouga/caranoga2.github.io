<form method="POST">
   <table>
      <tr>
         <th colspan="2">Nouveau Topic</th>
      </tr>
      <tr>
         <td>Sujet</td>
         <td><input type="text" name="tsujet" size="70" maxlength="70" /></td>
      </tr>
      <tr>
         <td>Catégorie</td>
         <td>
            <select>
               <option>Catégorie 1</option>
               <option>Catégorie 2</option>
               <option>Catégorie 3</option>
            </select>
         </td>
      </tr>
      <tr>
         <td>Sous-Catégorie</td>
         <td>
            <select>
               <option>Sous-Catégorie 1</option>
               <option>Sous-Catégorie 2</option>
               <option>Sous-Catégorie 3</option>
            </select>
         </td>
      </tr>
      <tr>
         <td>Message</td>
         <td><textarea name="tcontenu"></textarea></td>
      </tr>
      <tr>
         <td>Me notifier des réponses par mail</td>
         <td><input type="checkbox" name="tmail" /></td>
      </tr>
      <tr>
         <td colspan="2"><input type="submit" name="tsubmit" value="Poster le Topic" /></td>
      </tr>
      <?php if(isset($terror)) { ?>
      <tr>
         <td colspan="2"><?= $terror ?></td>
      </tr>
      <?php } ?>
   </table>
</form>