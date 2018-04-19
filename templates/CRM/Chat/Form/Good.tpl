{include file="CRM/Chat/Parts/Header.tpl}

{if $help.form.top}
  <div class="alert alert-{$help.form.top.level}">{$help.form.top.text}</div>
{/if}

{foreach from=$fields item=field}

<div class="form-group">
  {$form.$field.label}
  <div class="content">{$form.$field.html}</div>
  <p class="help-block">{$help.field.$field.text}</p>
</div>
{/foreach}

{if $help.form.bottom}
  <div class="alert alert-{$help.form.bottom.level}">{$help.form.bottom.text}</div>
{/if}

<div class="crm-submit-buttons">
  {include file="CRM/common/formButtons.tpl" location="bottom"}
</div>

{include file="CRM/Chat/Parts/Footer.tpl}