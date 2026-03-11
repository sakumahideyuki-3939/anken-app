# CLAUDE.md — anken-app-server プロジェクト

## プロジェクト概要
九星気学に基づく「暗剣殺・五黄殺・ダブル暗剣殺」判定アプリケーション。生年月日と指定日を入力すると、年盤・月盤・日盤の九星配置を算出し、五黄殺・暗剣殺・ダブル暗剣殺の該当判定を行う。本命星・命宮の自動算出、節入り日による月星補正、前日/翌日ナビゲーションなどの機能を備える。PHPサーバーサイドで動作する計算ロジック＋HTMLフロントエンド。

※ リポジトリにはALGO Inc.コーポレートサイト由来のファイル（about.php, company.php, blog.php等）も混在しているが、アプリ本体は暗剣判定ロジック部分のみ。

## リポジトリ・サーバー情報
| 項目 | 値 |
|------|-----|
| GitHub | anken-app |
| 本番URL | 未定 |
| ローカルパス | ~/projects/anken-app-server/ |
| デプロイ | GitHub Actions設定あり（SCP → さくらサーバー）だが本番運用は未定 |

### デプロイの仕組み（参考）
- `.github/workflows/deploy.yml` で `appleboy/scp-action` を使用
- mainブランチへのpushがトリガー
- デプロイ先: `/home/algo-inc/projects/algo-inc/anken-app`
- SSH接続情報: GitHub Secrets（`SERVER_HOST`, `SERVER_USER`, `SERVER_SSH_KEY`）

## フォルダ構造
```
anken-app-server/
│
│  ===== 暗剣アプリ本体 =====
├── day.php                # メイン画面（入力フォーム + 盤表示 + 判定結果）
├── calc_anken.php         # 統合ハブ（生年月日/指定日算出 → 各判定呼び出し）
├── logic_core.php         # 算出ロジック本体（年星・月星・日星の計算）※変更時は要検証
├── setsu.php              # 節入り日テーブル（1901〜2064年の全データ）
├── judge_gohou.php        # 五黄殺 判定ユニット
├── judge_anken.php        # 暗剣殺 判定ユニット（本命星+命宮の2ルール）
├── judge_double.php       # ダブル暗剣殺 判定ユニット（全81パターン対応表）
├── style.css              # アプリ専用CSS（盤表示・点灯ユニット）
│
│  ===== バックアップ/旧版 =====
├── calc_ankenのコピー.php  # calc_ankenの旧バージョン（バックアップ）
├── indexのコピー.php       # index.phpの旧バージョン（バックアップ）
│
│  ===== ALGO コーポレートサイト残骸（アプリとは無関係） =====
├── about.php / about_a.php / blog.php / company.php
├── contact.php / single.php / work.php
├── config.php             # ALGO Inc.サイト用設定（アプリでは未使用）
├── components/            # ALGO Inc.サイト用共通部品（header/footer/breadcrumb/sidebar）
├── assets/                # ALGO Inc.サイト用アセット（CSS/画像/JS）
├── blog/                  # ブログアーカイブ
│
│  ===== 設定・テスト =====
├── test.php / test-hello.html  # テストファイル
├── .gitignore
├── .github/workflows/deploy.yml
└── README.md              # ロジック仕様メモ
```

## 技術仕様
| 項目 | 内容 |
|------|------|
| 言語 | PHP（サーバーサイド計算）, HTML, CSS |
| フレームワーク | なし（素のPHP） |
| エントリーポイント | `day.php`（GETパラメータで日付指定） |
| CSS | `style.css`（アプリ専用）, `assets/css/main.css`（ALGOサイト用・アプリでは不使用） |
| レスポンシブ | 768px以下で1カラム化 |
| ビルドツール | なし |

### 算出ロジック構成（重要）
```
day.php（UI）
  └── calc_anken.php（統合ハブ）
        ├── logic_core.php【編集禁止】（年星・月星・日星の数値算出）
        │     └── setsu.php（節入り日テーブル）
        ├── judge_gohou.php（五黄殺判定）
        ├── judge_anken.php（暗剣殺判定）
        └── judge_double.php（ダブル暗剣殺判定）
```

### 判定ロジック概要
- **年星 (YEAR_no_base)**: 1919年基準、9年周期の降順配列で算出。1月は前年扱い
- **月星 (MONTH_no_base)**: 1919年7月基準、12ヶ月×9周期で算出
- **日星 (DATE_no_base)**: 陰陽遁切り替え日（`$date_change`配列）を基準に180日周期で算出
- **節入り日補正**: `$SDAY_array` で月の切り替わり日を参照。指定日が節入り前なら前月扱い
- **命宮 (meigu)**: 月盤上で本命星がどの方位にあるかで決定（巽/離/坤/震/中宮/兌/艮/坎/乾）
- **五黄殺**: 命宮の方位に「5」が入っていれば該当
- **暗剣殺**: 本命星または命宮に対応する中宮の組み合わせで判定
- **ダブル暗剣殺**: 親盤の中宮と子盤の中宮の組み合わせ（全81パターン）で対象星を特定

### URL パラメータ（day.php）
```
day.php?by=1967&bm=10&bd=13&ty=2026&tm=3&td=2
```
- `by`, `bm`, `bd`: 生年月日（年/月/日）
- `ty`, `tm`, `td`: 指定日（年/月/日）。省略時は今日

## 作業ステータス
- [x] 算出ロジック本体（logic_core.php）実装
- [x] 節入り日テーブル（setsu.php）作成
- [x] 五黄殺・暗剣殺・ダブル暗剣殺の判定ロジック実装
- [x] 統合ハブ（calc_anken.php）作成
- [x] メイン画面（day.php）— 入力フォーム + 盤表示 + 判定結果
- [x] 前日/翌日/今日ナビゲーション
- [x] ヒット時の点灯表示（.hit クラス）
- [x] GitHub Actions デプロイ設定（暫定）
- [ ] コーポレートサイト残骸ファイルの整理・削除
- [ ] 幸運生就月/幸運多忙日の判定ロジック実装（現在ラベルのみ）
- [ ] 月間カレンダー表示（1ヶ月分の判定一覧）
- [ ] ユーザー認証・生年月日の保存機能
- [ ] 本番環境の決定・デプロイフロー確立

## よくあるトラブル・注意点
- **`logic_core.php` は変更時要検証**: 算出ロジックの心臓部であり、変更する場合は必ず既存の計算結果が変わらないことを検証すること
- **コーポレートサイトのファイルが混在**: about.php, company.php, blog.php 等はALGO Inc.サイトからの残骸。アプリ本体とは無関係。将来的に整理が必要
- **バックアップファイル（〜のコピー.php）**: `calc_ankenのコピー.php`, `indexのコピー.php` が残っている。日本語ファイル名なので環境によっては問題になる可能性あり
- **config.phpはアプリでは未使用**: ALGOサイト用の設定ファイル。暗剣アプリのロジックからは参照されていない
- **deploy.ymlのデプロイ先に注意**: `/home/algo-inc/projects/algo-inc/anken-app` に設定されているが、本番運用がまだ未定
- **GETパラメータのバリデーション**: day.php はGETパラメータを直接intキャストしているのみ。範囲チェック（月:1-12, 日:1-31等）は未実装
- **setsu.phpの年範囲**: 1901〜2064年のデータ。範囲外の年を指定すると節入り補正が効かない
- **`.ftp-deploy-sync-state.json`**: FTPデプロイ用の状態ファイルが残っている（.gitignoreで除外済み）

## 最終更新
- **日付**: 2026-03-11
- **更新者**: Hide
- **内容**: CLAUDE.md・終了時ルールの確認（変更なし）
- **次回やること**: コーポレートサイト残骸の整理、幸運判定ロジック実装、月間カレンダー表示

---

## 終了時ルール

Hideが「終了」「終わり」「おわり」と言ったら、以下を順番に実行すること：
1. 作業ステータスを更新（完了したものに[x]をつける）
2. 最終更新の日付・次回やることを更新
3. 完了したタスクに対応するGitHub Issueをcloseする
   - リポジトリ：sakumahideyuki-3939/algo-os
   - トークン：Macのキーチェーン（osxkeychain）から取得
   - 対応するIssueタイトルを検索してclose
4. git add → commit → push
