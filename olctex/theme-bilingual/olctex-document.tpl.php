% !TEX TS-program = xelatex
% !TEX encoding = UTF-8

% DOCUMENT LAYOUT
\documentclass[letterpaper]{report}
\usepackage[top=2.5cm, bottom=2.5cm, left=2.5cm, right=2.5cm]{geometry}

% SPECIAL CASE PACKAGES

\usepackage{graphicx}
\usepackage{grffile}

\usepackage[parfill]{parskip}

\usepackage{multicol}
\usepackage{needspace}
\usepackage{soul}
\usepackage[table]{xcolor} % http://ctan.org/pkg/xcolor

\usepackage{titlesec}
\titlespacing{\section}{0pt}{*0}{*0}
\titlespacing{\subsection}{0pt}{*0}{*0}
\titlespacing{\subsubsection}{0pt}{*0}{*0}

%\titleformat{\subsection}{\normalfont}{\thesection}{0pt}{}

% FONTS
\usepackage{fontspec}
\setmainfont{Aboriginal Serif}
\setromanfont{Aboriginal Serif}
\setsansfont{Aboriginal Sans}

<?php // See: http://www.fauskes.net/nb/latextips/#disable_sectionnumbering ?>
% disables chapter, section and subsection numbering
\setcounter{secnumdepth}{-1} 

% CONTENT
\begin{document}
\raggedright

<?php foreach($variables['data'] as $item): ?>
<?php echo $item; ?>
<?php endforeach; ?>

\end{document}
