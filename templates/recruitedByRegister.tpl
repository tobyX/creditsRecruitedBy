<fieldset>
	<legend><label for="recruitedBy">{lang}wcf.user.recruitedBy{/lang}</label></legend>
	<div class="formElement">
		<div class="formFieldLabel">
			<label for="recruitedBy">{lang}wcf.user.recruitedBy{/lang}</label>
		</div>
		<div class="formField">
			<input type="text" class="inputText" name="recruitedBy" value="{$recruitedBy}" id="recruitedBy" />
			<script type="text/javascript" src="{@RELATIVE_WCF_DIR}js/AjaxRequest.class.js"></script>
			<script type="text/javascript" src="{@RELATIVE_WCF_DIR}js/Suggestion.class.js"></script>
			<script type="text/javascript">
				//<![CDATA[
				suggestion.setSource('index.php?page=PublicUserSuggest{@SID_ARG_2ND_NOT_ENCODED}');
				suggestion.init('recruitedBy');
				//]]>
			</script>
		</div>
		<div class="formFieldDesc">
			<p>{lang}wcf.user.recruitedBy.description{/lang}</p>
		</div>
	</div>
</fieldset>