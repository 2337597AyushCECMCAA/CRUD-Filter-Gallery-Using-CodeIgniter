## Gallery CRUD System with Filtering

This project is a dynamic image gallery management system built using CodeIgniter 3. It allows users to manage (Create, Read, Update, Delete) images in the gallery and filter them based on different divisions. The gallery is designed to be responsive and includes a carousel for featured images, integrated with Fancybox and Swiper for enhanced user experience.

### Features

- **CRUD Operations**: Add, view, edit, and delete images in the gallery.
- **Filter Functionality**: Filter images by divisions using interactive buttons.
- **Responsive Design**: The gallery and carousel are fully responsive, ensuring a seamless experience across devices.
- **Image Carousel**: Display featured images in a carousel with smooth transitions.
- **Lightbox Integration**: View images in a lightbox using Fancybox for an immersive experience.
- **Division Management**: Dynamically filter gallery images by different divisions (categories).
- **User-Friendly Interface**: Clean and intuitive UI for easy navigation and image management.

### Technologies Used

- **Backend**: PHP with CodeIgniter 3
- **Frontend**: HTML, CSS, Bootstrap, JavaScript, jQuery
- **Plugins**:
  - **Fancybox**: For lightbox functionality
  - **Swiper**: For responsive carousel integration
- **Database**: MySQL for storing image metadata and division information

### Installation & Setup

1. **Clone the repository**:
   ```bash
   git clone https://github.com/your-username/gallery-crud-filter.git
   ```

2. **Navigate to the project directory**:
   ```bash
   cd gallery-crud-filter
   ```

3. **Setup the database**:
   - Import the provided SQL file to create necessary tables.
   - Update database configurations in `application/config/database.php`.

4. **Upload Directory**:
   - Ensure the `uploads/images/` directory is writable for image uploads.

5. **Run the application**:
   - Access the project via `http://localhost/your-project-directory`.

### Usage

- **Manage Gallery**:
  - Navigate to the "Manage Gallery" section to add, edit, or delete images.
- **Filter Images**:
  - Use the division buttons to filter images by specific categories.
- **View in Lightbox**:
  - Click on any image to view it in a lightbox.

### Future Enhancements

- **User Authentication**: Add login and user roles for secure gallery management.
- **Advanced Search**: Implement advanced search filters based on multiple criteria.
- **Drag-and-Drop Upload**: Enhance the image upload interface with drag-and-drop functionality.
- **Bulk Operations**: Add functionality for bulk image deletion or category assignment.

### Contributing

Contributions are welcome! Feel free to submit a pull request or report issues.
