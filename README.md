# Zylu Country-Based Pricing Plugin

This lightweight WordPress plugin helps you **display different content or pricing blocks based on the visitor’s country**, using **Cloudflare’s IP geolocation** feature.

## 🌍 Features

- Automatically detects visitor country using Cloudflare headers
- Adds useful CSS classes to the `<body>`:
  - `visitor-india` or `visitor-international`
  - `visitor-country-xx` (e.g., `visitor-country-us`, `visitor-country-sa`)
- Displays the visitor’s country code in the footer (for debugging)
- Includes built-in CSS to show/hide specific pricing blocks

---

## 🛠️ Installation

1. Ensure your WordPress site is behind [Cloudflare](https://www.cloudflare.com/) with **IP Geolocation** enabled in **Network Settings**.
2. Prepare the plugin file by downloading the file zylu-country-detector.php and ZIP it.
3. In your WordPress admin:
   - Go to **Plugins → Add New → Upload Plugin**
   - Upload the ZIP file and activate the plugin

---

## ✅ How It Works

### ✅ Body Classes Added

The plugin adds the following classes to the `<body>` tag:

- `visitor-india` if visitor is from India (`IN`)
- `visitor-international` if from outside India
- `visitor-country-xx` where `xx` is the 2-letter country code in lowercase

### ✅ CSS Visibility Rules

The plugin injects this CSS automatically:

```css
/* Hide all pricing sections by default */
.pricing-india,
.pricing-international,
[class^='pricing-'] {
  display: none;
}

/* Show relevant pricing blocks based on visitor location */
body.visitor-india .pricing-india {
  display: block;
}
body.visitor-international .pricing-international {
  display: block;
}
body.visitor-country-in .pricing-india,
body.visitor-country-us .pricing-usa,
body.visitor-country-sa .pricing-saudi {
  display: block;
}
```

---

## 💡 Use Cases

- Show **India pricing** to Indian visitors
- Show **USD or AED pricing** to international visitors
- Target country-specific discounts and plans using Elementor, shortcodes, or custom blocks

---

## 📌 Requirements

- WordPress
- Cloudflare (with IP Geolocation enabled)

---

## 📃 License

MIT License – feel free to use, modify, and contribute.

---

## 🤝 Contributing

Pull requests are welcome. If you’d like to improve detection, add filters, or expand functionality, feel free to open an issue or submit a PR.
