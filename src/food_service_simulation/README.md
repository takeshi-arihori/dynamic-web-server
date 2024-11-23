# プロジェクト概要

このプロジェクトでは、簡易的なレストラン注文システムを形成するいくつかのクラスを実装します。  
オブジェクト指向プログラミングの四大柱（カプセル化、抽象化、継承、ポリモーフィズム）を活用しながら、PHP の構文を練習していきます。

## プロジェクトのテーマ

テーマは「食事」で、以下の要素をモデル化します：

- **FoodItem**: 各食品アイテムの基本情報を表現するクラス
- **Person**: 顧客や従業員を表現する汎用クラス
- **Restaurant**: レストラン全体の管理を行うクラス

---

## クラス詳細

### 1. FoodItem

- 食品アイテムの名称、説明、価格をカプセル化する抽象クラス。
- 具象クラス（例: `HawaiianPizza`, `Spaghetti`, `Cheeseburger`）が特定の食品カテゴリを表現します。
- **カテゴリ情報**:
  - 各クラスはカテゴリを表す定数を持つ（例: `Pizza::CATEGORY`）。
  - クラス静的メソッドや定数としてカテゴリを取得可能。
  - 例: `Pizza::getCategory()` または `Pizza::CATEGORY`。

---

### 2. Person

- 一般的な人物を表現するクラス。
- 名前、年齢、住所などの共通属性をカプセル化。
- **サブクラス**:
  - `Customer`: 顧客としての固有のプロパティや振る舞いを持つ。
  - `Employee`: 従業員としての固有のプロパティや振る舞いを持つ。

---

### 3. Restaurant

- レストラン全体を管理する具体的なクラス。
- **主なプロパティ**:
  - `menu`: `FoodItem` オブジェクトのリスト。
  - `staff`: `Employee` オブジェクトのリスト。
- **主なメソッド**:
  - `order()`: 食品カテゴリを指定して食品を注文。
  - `generateInvoice()`: 注文の請求書を生成。

---

## システムの動作

### フローの概要

1. **注文処理**:
   - 顧客が興味のある食品カテゴリを提示。
   - レジ係（`Cashier`）が注文を受け、食品リストをもとにオーダーを生成。
   - シェフ（`Chef`）に調理依頼を委任。
2. **請求書生成**:
   - オーダーに基づき、請求書（`Invoice`）を生成。
   - 請求書には、以下の情報を含む：
     - 最終価格
     - 注文時間
     - 完了時間

---

## 特記事項

- 行動は文字列でシミュレーションされます。
  - 例: `"The cashier John created a food order."`  
    `"The chef William cooked a Pizza."`
- **顧客の興味カテゴリ判定**:
  - `Customer::interestedCategories()`:
    - レストランのメニューから興味のあるカテゴリを取得。
    - 結果を `Restaurant::order()` に渡して処理。
- クラス情報の取得:
  - クラス名: `{Class}::classname`（例: `Cheeseburger::classname`）
  - 定数・静的メソッド: `self::{NAME}`（例: `self::CATEGORY`）
- 現在の時間の取得:  
  `date("D M d, Y G:i")` または Carbon ライブラリを使用。
- 厳密な型指定を使用。

---

## 実装例

以下の例では、レストラン`saizeriya`における一連の注文フローを示します。

- **レストラン**: `saizeriya`
  - スタッフ:
    - シェフ: `Invah`
    - レジ係: `Nadia`
  - メニュー: `Cheeseburger`, `Fettuccine`, `HawaiianPizza`, `Spaghetti`
- **顧客**: `Tom`
  - 注文内容:
    - `Margherita` x 1
    - `Cheeseburger` x 2
    - `Spaghetti` x 1
