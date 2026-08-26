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

1. Create the directory of `CJ/StaffReplies` within `upload/src/addons`
2. Extract/place all files into the `StaffReplies` folder
3. Refresh addons in the dashboard and ensure it's installed/enabled

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

## License

XenForo Staff Replies (2.3.X) © 2025 by Connor J Davies is licensed under CC BY-SA 4.0. To view a copy of this license, visit https://creativecommons.org/licenses/by-sa/4.0/
