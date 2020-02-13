"挿入モードでのカーソル移動(vi互換)
map! <C-B> <Left>
map! <C-F> <Right>


set clipboard=unnamed "ヤンクしたデータをクリップボードに保存する
set wildmenu  "コマンドラインの補完候補表示
set autoindent "字下げ
set backspace=2

"対応するカッコをわかりやすく
hi MatchParen ctermfg=LightGreen ctermbg=blue

"通常はブロック型点滅カーソル
"挿入モード時はライン型点滅カーソル
let &t_ti.="\e[1 q"
let &t_SI.="\e[5 q"
let &t_EI.="\e[1 q"
let &t_te.="\e[0 q"
