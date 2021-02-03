{% raw %} 
<ul>
  <li>Snowflake URL: 
    <code class="highlighter-rouge"><?php echo $sfcreds['host']; ?></code>
    - the URL for your Snowflake environment
  </li>
  <li>Username: 
    <code class="highlighter-rouge"><?php echo $sfcreds['username']; ?></code>
  </li>
  <li>Password: 
    <code class="highlighter-rouge"><?php echo 'your_snowflake_password'; ?></code>
  </li>
  <li>Warehouse: 
    <code class="highlighter-rouge"><?php echo $sfcreds['warehouse']; ?></code>
    - the warehouse you want to deliver to in this test. You may need to
    create this in the Snowflake console.
  </li>
  <li>Database: 
    <code class="highlighter-rouge"><?php echo $sfcreds['dbname']; ?></code>
    - the database you want to use in this test. You may need to
    create this in the Snowflake console.
  </li>
</ul>
{% endraw %}
