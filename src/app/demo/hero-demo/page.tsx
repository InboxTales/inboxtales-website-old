'use client';

import { motion } from 'framer-motion';
import { useEffect, useState } from 'react';
import styles from './hero-demo.module.css';

export default function HeroDemo() {
  const [isLoaded, setIsLoaded] = useState(false);

  useEffect(() => {
    setIsLoaded(true);
  }, []);

  return (
    <div className={styles.heroContainer}>
      <div className={styles.heroContent}>
        <motion.div
          initial={{ opacity: 0, y: 20 }}
          animate={{ opacity: isLoaded ? 1 : 0, y: isLoaded ? 0 : 20 }}
          transition={{ duration: 0.8, delay: 0.2 }}
          className={styles.heroText}
        >
          <h1>
            <span className={styles.gradientText}>Creative</span> Digital
            <br />
            Agency for Your
            <br />
            <span className={styles.highlight}>Success Story</span>
          </h1>
          <p className={styles.subText}>
            We craft digital experiences that inspire, engage, and deliver exceptional results
          </p>
        </motion.div>

        <motion.div
          initial={{ opacity: 0, y: 30 }}
          animate={{ opacity: isLoaded ? 1 : 0, y: isLoaded ? 0 : 30 }}
          transition={{ duration: 0.8, delay: 0.4 }}
          className={styles.ctaContainer}
        >
          <button className={styles.primaryButton}>Get Started</button>
          <button className={styles.secondaryButton}>Our Work</button>
        </motion.div>

        <div className={styles.backgroundElements}>
          <div className={styles.gradientOrb1}></div>
          <div className={styles.gradientOrb2}></div>
        </div>
      </div>
    </div>
  );
} 