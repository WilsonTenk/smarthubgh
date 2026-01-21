# PulseView WordPress Theme Documentation

## Installation Instructions

1.  **Download/Package**: Ensure the `wordpress-theme` folder is zipped or uploaded to your WordPress installation.
2.  **Upload**: Go to **Appearance > Themes > Add New > Upload Theme** and upload the zip file (or copy the folder to `wp-content/themes/`).
3.  **Activate**: Click **Activate** on the PulseView theme.

## Configuration Guide

### 1. Menus
-   Go to **Appearance > Menus**.
-   Create a new menu (e.g., "Main Header").
-   Add your Categories (Politics, Health, Tech, etc.) to this menu.
-   Check the **Primary Menu** checkbox under Display Location.
-   Create another menu for the footer and assign it to **Footer Menu**.

### 2. Homepage Setup
-   Create a new Page named "Home".
-   In the Page Attributes section (right sidebar), select **Template: Home**.
-   Publish the page.
-   Go to **Settings > Reading**.
-   Select **A static page**.
-   Set **Homepage** to "Home".
-   (Optional) Set **Posts page** to a page named "Blog" (assign "Template: Blog / News" to it if you want the custom layout).

### 3. Projects Portfolio
The theme includes a "Projects" Custom Post Type.
-   Go to **Projects > Add New**.
-   Enter Title and Description.
-   **Custom Fields**:
    -   **Technologies**: Comma-separated list (e.g., "React, Node.js, AWS").
    -   **Live Project URL**: Full URL to the live site.
    -   **GitHub Repository URL**: Full URL to the repo.
-   **Featured Image**: Set a Project Image.
-   **Categories**: Assign a category (e.g., "Web App", "Design").

### 4. Widgets
-   Go to **Appearance > Widgets**.
-   **Footer Widgets**: Add widgets here to populate the dynamic footer area. If left empty, the default static links seen in the demo will be displayed.

## Data Migration / Content Setup

To match the demo site:

1.  **Create Categories**: Politics, Health, Business, Tech, Sports, Opinion, Top 10.
2.  **Tags**: Use tags like 'Breaking', 'Featured', 'Top 10' to control where posts appear on the homepage.
    -   **Breaking News Ticker**: Shows latest 5 posts with tag `breaking`.
    -   **Hero Article**: Shows latest 1 post with tag `featured` (or just the latest sticky post).
    -   **Top 10 Section**: Shows posts with tag `top-10`.
3.  **Importing Projects**:
    -   Manually add projects via **Projects > Add New** as described above.

## Customization Notes

-   **Colors**: The theme uses Tailwind CSS classes. To change core colors globally, you would edit `style.css` (if custom variables used) or modify the Tailwind classes in the PHP templates.
-   **Fonts**: Google Fonts (Inter, Playfair Display) are enqueued in `functions.php`.
-   **Footer**: The "Pulse Health" status in the footer is dynamic based on server time.

## File Structure
-   `style.css`: Main stylesheet & Metadata.
-   `functions.php`: Core logic.
-   `template-parts/content-card.php`: Reusable card component.
-   `template-home.php`: Custom Homepage logic.
