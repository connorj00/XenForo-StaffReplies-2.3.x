# XenForo Staff Replies Add-On

A lightweight XenForo add-on that allows users with the appropriate permissions to post hidden replies. These replies are only visible to other users with the same permissions, making it ideal for internal staff discussions.

---

## Description

The **XenForo Staff Replies Add-On** introduces the ability for staff members or other designated users to post replies that are hidden from the general user base. This functionality helps facilitate private conversations within public threads, enhancing team collaboration while maintaining thread visibility for standard users.

---

## Getting Started

### Dependencies

- XenForo 2.0.10+
- PHP 7.1.0+

---

### Installation

To install the add-on, follow these steps:

1. Open **XenForo Admin CP** → **Add-ons** → **Install/Upgrade from archive**.
2. Select the `.zip` file for the add-on.
3. Click **Install** and wait for the process to complete.

---

### Configuration

#### **Permissions**

To configure permissions for this add-on:

1. Open **XenForo Admin CP** → **Forums** → **Node Permissions**.
2. Select the desired node and user group.
3. Locate the "Staff Replies" permission and adjust it as needed.
4. Save your changes.

#### **Customization**

To customize the appearance of staff reply posts:

1. Open **XenForo Admin CP** → **Appearance** → **Styles** → **Master Style** → **Templates**.
2. Search for the `staffreplies.css` template file.
3. Modify the CSS as desired and save the changes.

---

## Help

For common problems or troubleshooting, follow these steps:

- **Issue**: Permission not working as expected.  
  **Solution**: Double-check that permissions are configured correctly in Node Permissions for the relevant user groups.

If you require additional assistance, 

Join the Discord server: https://discord.gg/uPGJq3MgJ8
Or email: support@cjdev.uk

---

## Authors

- [@CJDevUK](https://cjdev.uk)
- [@1a3Dev](https://1a3.uk)

---

## Version History

- **1.0.0**
  - Initial release.

---

## License

This project is licensed under the MIT License - see the [LICENSE.md] file for details.
