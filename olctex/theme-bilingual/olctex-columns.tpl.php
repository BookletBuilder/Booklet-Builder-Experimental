\setlength{\columnsep}{.25in}
\begin{multicols}{<?php echo $variables['cols'] ?>}
<?php foreach ($variables['data'] as $item): ?>
<?php echo $item ?>
<?php endforeach ?>
\end{multicols}