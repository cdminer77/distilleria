# 🍸 Distilleria AfterBit - E-Commerce & Catalogo Prodotti

Piattaforma E-Commerce e catalogo digitale per la **Distilleria & Liquorificio Artigianale AfterBit**.

🌐 **Demo Live (GitHub Pages):** [https://cdminer77.github.io/distilleria/](https://cdminer77.github.io/distilleria/)  
🌐 **Dominio Server (WP/WooCommerce):** [https://test100.afterbit.it](https://test100.afterbit.it)

---

## 📋 Caratteristiche del Progetto

* **Hero Slider a Piena Larghezza:** 4 slide tematiche ad alto impatto (Amari alpini, Grappe barricate invecchiate, Botanici e Percorsi di degustazione guidata) con autoplay, controlli swipe touch, indicatori e pulsanti CTA.
* **Logo Istituzionale Vettoriale:** Emblema in finitura oro con alambicco/botaniche e tipografia dedicata.
* **Catalogo Prodotti Liquorificio (10 Spirits Artigianali):**
  1. *Limoncello Artigianale di Sorrento IGP (500ml)* – 18,50 €
  2. *Amaro alle Erbe Alpine e Radici Selvagge (700ml)* – 24,00 €
  3. *Grappa Barricata Invecchiata 5 Anni in Rovere (700ml)* – 34,50 € (In Offerta)
  4. *Gin Botanico Italiano con Agrumi del Mediterraneo (700ml)* – 38,00 €
  5. *Mirto Tradizionale di Sardegna (700ml)* – 21,00 €
  6. *Nocino Riserva Tradizionale da Mallo Fresco (500ml)* – 26,50 €
  7. *Liquore Artigianale alla Liquirizia di Calabria DOP (500ml)* – 19,00 €
  8. *Sambuca Stellata Extra Superiore (700ml)* – 22,50 €
  9. *Crema di Melone Cantalupo & Panna Fresca (500ml)* – 16,90 €
  10. *Vermouth Rosso Superiore Artigianale (750ml)* – 27,00 € (In Offerta)
* **Punti di Forza:** Box informativi minimalisti (100% Ingredienti Naturali, Distillazione Lenta in Rame a bagnomaria, Spedizione Sicura e Veloce anti-rottura).
* **Interattività Showcase:** Filtri dinamici per categoria, carrello interattivo con notifiche toast e calcolo subtotale.
* **Pagine Dedicate:**
  * `index.html` (Home Page completa)
  * `negozio.html` (Catalogo prodotti con filtri di categoria)
  * `chi-siamo.html` (Storia, filosofia produttiva e alambicchi)
  * `contatti.html` (Recapiti e form di richiesta degustazioni)
* **Pulsante "Torna su":** Personalizzato con finitura oro/ambra coordinata in basso a destra.

---

## 🗂️ Struttura della Repository

```
distilleria/
├── .github/
│   └── workflows/
│       ├── deploy.yml          # Linter e test PHP
│       └── deploy-pages.yml    # Pipeline di pubblicazione automatica su GitHub Pages
├── docs/                       # File statici pubblicati su GitHub Pages
│   ├── assets/
│   │   ├── logo.svg            # Logo vettoriale
│   │   ├── style.css           # Fogli di stile
│   │   └── main.js             # Slider, carrello e filtri
│   ├── index.html              # Home Page
│   ├── negozio.html            # Catalogo Shop
│   ├── chi-siamo.html          # La Nostra Storia
│   └── contatti.html           # Degustazioni & Contatti
├── wp-content/
│   └── themes/
│       └── distilleria-child/  # Child Theme WordPress per l'installazione su server
├── .gitignore
└── README.md
```

---

## ⚙️ Attivazione GitHub Pages

Se non è già attivo automaticamente tramite GitHub Actions, abilitare GitHub Pages dalle impostazioni del repository:
1. Andare su **Settings > Pages** del repository `cdminer77/distilleria`.
2. Sotto **Build and deployment > Source**, selezionare **GitHub Actions** (oppure **Deploy from a branch**: branch `main` cartella `/docs`).
3. Il sito sarà visibile pubblicamente all'indirizzo:  
   👉 **`https://cdminer77.github.io/distilleria/`**
