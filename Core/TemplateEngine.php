<?php 
namespace Core;
class TemplateEngine 
{
	public function template($f,$controller,$view)
	{
		$handle = fopen($f, "r");
		if ($handle) {
			$allLines='';
		    while (($line = fgets($handle)) !== false) {
	    		$line = preg_replace_callback_array(
	    			[
	    				'/{{(.+)}}/' => function ($match){return '<?= htmlspecialchars('.$match[1].') ?>';
	    				},
	    				'/@[i][f]\D(.+)\s/' => function ($match){return '<?php if'.$match[1].': ?>';
	    				},
	    				'/@[e][l][s][e][i][f]\D(.+)\s/' => function ($match){return '<?php elseif'.$match[1].': ?>'; 
	    				},
	    				'/@[e][l][s][e]\s/' => function ($match){return '<?php else: ?>';
	    				},
	    				'/@[e][n][d][i][f]/' => function ($match){return '<?php endif; ?>';
	    				},
	    				'/@[f][o][r][e][a][c][h]\s(.+)/' => function ($match){return '<?php foreach'.$match[1].': ?>'; 
	    				},
	    				'/@[e][n][d][f][o][r][e][a][c][h]/' => function ($match){return '<?php endforeach; ?>';
	    				}, 
	    				'/@[i][s][s][e][t](.+)/' => function ($match){return '<?php if(isset'.$match[1].'): ?>';
	    				},
	    				'/@[e][n][d][i][s][s][e][t]/' => function ($match){return '<?php endif; ?>';
	    				},
	    				'/@[e][m][p][t][y](.+)/' => function ($match){return '<?php if(isset'.$match[1].'): ?>';
	    				},
	    				'/@[e][n][d][e][m][p][t][y]/' => function ($match){return '<?php endif; ?>';
	    				}
	    			],
	    			$line
	    		);
	    		$allLines .= $line;
		    }
			fclose($handle);
			$file = implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'Storage','View', str_replace('Controller', '', basename(ucfirst($controller))), $view]) . '.php'; 
			$handles = fopen($file, 'w+');
			fwrite($handles, $allLines);
			fclose($handles);
			return $file;
		}
	}
}