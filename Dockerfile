FROM php:8.2-cli

WORKDIR /var/www/html

# Copy application files
COPY . .

# Create healthcheck file
RUN echo "OK" > public/health.txt

# Expose port
EXPOSE 8000

# Start PHP server
CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"]
