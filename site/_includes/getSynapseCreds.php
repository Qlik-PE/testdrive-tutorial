{% raw %} 
<div markdown="0">
<?php
if (defined('SYNAPSE') && (SYNAPSE != 'unset')):
   $synapseCreds = json_decode(SYNAPSE, true);
?>
<blockquote>
<p>Note: This is the connection information provided by Microsoft Azure Partner Center: </p>
<ul>
  <li><strong>Synapse Server</strong>: 
    <code class="highlighter-rouge"><?php echo $synapseCreds['server']; ?></code>
    &mdash; the server for your Synapse environment
  </li>
  <li><strong>SQL Pool</strong>: 
    <code class="highlighter-rouge"><?php echo $synapseCreds['sqlpool']; ?></code>
    &mdash; at present, this is the same as the server for your Synapse environment
  </li>
  <li><strong>Database</strong>: 
    <code class="highlighter-rouge"><?php echo $synapseCreds['database']; ?></code>
    &mdash; the database you want to use in this test 
  </li>
  <li><strong>Port</strong>: 
    <code class="highlighter-rouge"><?php echo $synapseCreds['port']; ?></code>
    &mdash; the port your server is listening on
  </li>
  <li><strong>Username</strong>: 
    <code class="highlighter-rouge"><?php echo $synapseCreds['username']; ?></code>
    &mdash; the username you will use to access this database
  </li>
  <li><strong>Password</strong>: 
    <code class="highlighter-rouge"><?php echo $synapseCreds['password']; ?></code>
    &mdash; the password you selected when setting up this Azure Partner Center trial
  </li>
</ul>
</blockquote>
<?php endif; ?>
</div>
{% endraw %}
