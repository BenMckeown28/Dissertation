<h2>Create Treatment</h2>
<div class="POForm">

<form id="create" action="createTreatment.php" method="POST">
<label>Treatment name</label>
<input class="form-control" placeholder="Treatment name" type="text" name="treatmentname"  /> </br>
<label>Treatment description</label>
<textarea class="form-control" name="Tdesc" rows="10" cols="30" /> </textarea></br>
<label>Category</label>
<select class="form-control" name="category">
  <option>
    Waxing
  </option>
  <option>
    Eyelash & Eyebrow Treatments
  </option>
  <option>
Hand/Foot & Gel Treatments
  </option>
  <option>
Massage
  </option>
  <option>
Facials
  </option>
  <option>
Holistic Treatments
  </option>
</select>
<br />
<label>Price  £</label>
<input class="form-control" type="text" name="price" /></br>
<label>Estimated Time (Minutes)</label>
<input class="form-control" type="text" name="esttime" /></br>
<input class="form-control" type="submit" name="submit" value="create" />
</form>
</div>
